import { Scene3d } from './classScene3d.js';

class SceneManager {
    constructor(selector, modelUrl, sceneName) {
        this.scene = new Scene3d(selector, modelUrl, sceneName);
    }

    initScene() {
        this.scene.initScene();
    }

    loadClothing(url, type, name, color) {
        this.scene.loadSingleClothing(url, type, name, color);
    }

    putOnclothes(itemUrl, type, name, color, callback) {
        if (this.scene && typeof this.scene.putOnclothes === 'function') {
            this.scene.putOnclothes(itemUrl, type, name, color, callback);
        } else {
            console.error("Error loading 3d clothings.");
        }
    }
}

export default SceneManager;
