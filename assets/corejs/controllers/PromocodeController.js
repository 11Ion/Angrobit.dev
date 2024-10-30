import { PromocodeModel } from '../models/PromocodeModel.js';
import { PromocodeView } from '../views/PromocodeView.js';

export class PromocodeController {
    constructor() {
        this.promocodeModel = new PromocodeModel();
        this.promocodeView = new PromocodeView();
    }

   
}
