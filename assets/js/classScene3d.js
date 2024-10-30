import * as THREE from './three.module.js';
import { OrbitControls } from './examples/jsm/controls/OrbitControls.js';
import { GLTFLoader } from './examples/jsm/loaders/GLTFLoader.js';

// Class Model 3D
export class Scene3d {
    constructor(containerSelector, modelUrl, sceneType = 'home',  config = {}){
       this.containerSelector = containerSelector;
       this.modelUrl = modelUrl;
       this.sceneType = sceneType; 
       this.scene = null; 
       this.camera = null;
       this.renderer = null;
       this.controls = null;
       this.model = null;
 
       this.config = {
          widthVmin: config.widthVmin || 30,
          heightVmin: config.heightVmin || 100, 
          lightIntensity: config.lightIntensity || 3,
          cameraPosition: config.cameraPosition || { x: 0, y: 1.7, z: 0.5 },
          cameraLookAt: config.cameraLookAt || { x: 0, y: 1.7, z: 0 },
          ...config,
       }
 
       this.clothingModels = { upper: null, lower: null, caps: null };
       this.initScene();
    }
    
    initScene(){
       this.scene = new THREE.Scene();
       this.camera = new THREE.PerspectiveCamera(75, this.config.widthVmin / this.config.heightVmin, 0.5, 1000);
       this.camera.position.set(this.config.cameraPosition.x, this.config.cameraPosition.y, this.config.cameraPosition.z);
       this.camera.lookAt(this.config.cameraLookAt.x, this.config.cameraLookAt.y, this.config.cameraLookAt.z);
 
       const canvas = document.querySelector(this.containerSelector);
       if (!canvas) return console.error("Canvas element not found");
       this.renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
 
       this.resizeRenderer();
       this.addLighting();
       this.controls = new OrbitControls(this.camera, this.renderer.domElement);
       this.configureControls();
       window.addEventListener('resize', () => this.resizeRenderer());
       this.animate();
 
       this.loadModel((mannequin) => {
          this.mannequinModel = mannequin;  
          this.scene.add(mannequin);
      });
    }
    
    addLighting() {
       const hemiLight = new THREE.HemisphereLight(0xffffff, 0x8d8d8d, this.config.lightIntensity);
       hemiLight.position.set(0, 20, 0);
       this.scene.add(hemiLight);
 
       const dirLight = new THREE.DirectionalLight(0xffffff, this.config.lightIntensity);
       dirLight.position.set(3, 10, 10);
       dirLight.castShadow = true;
       this.scene.add(dirLight);
   }
 
    configureControls() {
       this.controls.minPolarAngle = Math.PI / 2;
       this.controls.maxPolarAngle = Math.PI / 2;
       this.controls.enabled = false;
    }
 
    resizeRenderer() {
       const { widthVmin, heightVmin } = this.calculateModelDimensions();
       this.camera.aspect = widthVmin / heightVmin;
       this.camera.updateProjectionMatrix();
       this.renderer.setSize(widthVmin, heightVmin);
   }
 
    calculateModelDimensions() {
       const isHomeScene = this.sceneType === 'home';
       const isCatalogScene = this.sceneType === 'catalog';
       const isPopupScene = this.sceneType === 'popup_preview';
 
       let modelWidthVmin = (30 / 100) * Math.min(window.innerWidth, window.innerHeight);
       let modelHeightVmin = isHomeScene ? (100 / 100) * Math.min(window.innerWidth, window.innerHeight) : (75 / 100) * Math.min(window.innerWidth, window.innerHeight);
       
       if (isHomeScene && window.innerHeight < 1000 && window.innerWidth < 600) { // home model responsive
          modelWidthVmin = window.innerWidth * 0.4;
          modelHeightVmin = window.innerHeight * 0.8;
       }  else if (isCatalogScene && window.innerWidth < 1280) { // catalog model resonsive
          modelWidthVmin = window.innerWidth * 0.3;
          modelHeightVmin = window.innerHeight * 0.6;
       }  else if (isPopupScene) {
          // popup model model responsive
          modelWidthVmin = 250;
          modelHeightVmin =  700;
          if (window.innerWidth <= 900) {
              return {
                  widthVmin: 300,
                  heightVmin: 300
              };
          } else if (window.innerHeight <= 740) {
              return {
                  widthVmin: 200,
                  heightVmin: 560
              };
          } else if (window.innerHeight <= 900) {
              const adjustedHeight = window.innerHeight - 100;
              const heightScaleFactor = adjustedHeight / 800;
              return {
                  widthVmin: 250 * heightScaleFactor,
                  heightVmin: 700 * heightScaleFactor
              };
          }
      }
      return { widthVmin: modelWidthVmin, heightVmin: modelHeightVmin };
    }     
 
    loadSingleClothing(itemUrl, type, name, color) {
       this.clearAllClothesFromScene();
       this.loadClothes(itemUrl, (clothingModel) => {
           clothingModel.name = name;
           this.scene.add(clothingModel);
           if (color) {
               clothingModel.traverse((child) => {
                   if (child.isMesh) {
                       child.material.color.set(this.getColorHex(color)); 
                   }
               });
           }
       });
   }
 
   clearAllClothesFromScene() {
    this.scene.children.forEach(object => {
        if (object.isClothing) {
            object.traverse((child) => {
                if (child.isMesh) {
                    if (child.material) child.material.dispose();
                    if (child.geometry) child.geometry.dispose();
                }
            });
            this.scene.remove(object);
        }
    });
 }
    putOnclothes(itemUrl, type, name, color, callback) {
          // If exist clothes for this type, we remove them
          if (this.clothingModels[type]) {
             this.removeModel(this.clothingModels[type]);
          }
          // Load the clothes
          this.loadClothes(itemUrl, (clothingModel) => {
             clothingModel.name = name;
             this.clothingModels[type] = clothingModel;
             this.scene.add(clothingModel);
             // update color, if exist
             if (color) { clothingModel.traverse((child) => {child.isMesh && child.material.color.set(this.getColorHex(color))}) }
             if (typeof callback === 'function') { callback(clothingModel) }
          });
    }
       // function remove 3d model from scene
       removeModel(model) {
          model !== this.mannequinModel && this.scene.remove(model);
          model.traverse(child => {
             child.material && child.material.dispose();
             child.geometry && child.geometry.dispose();
          });
       }
    // function load clothes      
    loadClothes(itemUrl, callback = () => {}) {  
       const loader = new GLTFLoader();
       loader.load(itemUrl, (gltf) => {
           this.model = gltf.scene;
           this.model.position.set(0.055, -1.25, 0);
           this.model.isClothing = true;
           this.scene.add(this.model);
           this.setupModelMaterials(this.model);
   
           if (typeof callback === 'function') {
               callback(this.model);
           }
       }, undefined, (error) => {
           console.error('Error loading model:', error);
       });
   }
 
    loadModel(callback) {
       const loader = new GLTFLoader();
       loader.load(this.modelUrl, (gltf) => {
          this.mannequinModel = gltf.scene; 
          this.mannequinModel.position.set(0.055, -1.25, 0);
          this.scene.add(this.mannequinModel);
          this.setupModelMaterials(this.mannequinModel);
          
          if (callback) callback(this.mannequinModel);
       }, undefined, (error) => {
          console.error('Error loading model:', error);
       });
    }
 
    setupModelMaterials(model) {
       const emissiveMaterial = new THREE.MeshStandardMaterial({ color: 0x2e2e2e, metalness: 0, roughness: 0.2, emissive: 0x000000, emissiveIntensity: 0.05 });
       model.traverse((child) => {
          if (child.isMesh && child.name === "body") {
             child.material = emissiveMaterial;
          }
          this.setLimbRotations(child); 
       });
    }
    
    setLimbRotations(child) {
          const rotations = { upper_armR: { z: 2.8 }, upper_armL: { z: -2.8 }, forearmL: { x: 0, z: -0.25 }, handL: { z: 0, x: -.2 }, handR: { z: 0, x: -.2 }, forearmR: { x: 0, z: 0 }, thighR: { z: 0.09 }, thighL: { z: -0.09 }, footR: { z: 0.5 }, footL: { z: -0.5 }};
          if (rotations[child.name]) { Object.assign(child.rotation, rotations[child.name]); }
    }
 
   getColorHex(color){
       const colorMap = { white: 0xffffff, black: 0x000000, yellow: 0xd1d393, green: 0x98dace, purple: 0x9e95d6, burlywood: 0xdfb49b, orange: 0xdfb49b, blue: 0xA0E4E8, red: 0xB83131};
       if (colorMap[color]) { return colorMap[color]; }
       if (/^#[0-9A-Fa-f]{6}$/.test(color)) { return parseInt(color.replace('#', ''), 16);}
       return 0x000000; // default value
   }
 
    animate() {
       requestAnimationFrame(() => this.animate());
       this.controls.update();
       this.renderer.render(this.scene, this.camera);
    }
 }