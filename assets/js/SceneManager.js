// SceneManager.js
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
}

export default SceneManager;
