export class Popup {
   constructor(templateId, popupSelector, closeMaskSelector, closeBtnSelector, triggerElement = null) {
      this.templateInstance = null;
      if(templateId){
         const template = document.getElementById(templateId);
         const popupContent = template.content.cloneNode(true);
         this.templateInstance = template;
         document.body.appendChild(popupContent);
      }
       this.popup = document.getElementById(popupSelector);
       this.closeMask = document.getElementById(closeMaskSelector);
       this.closeBtn = document.getElementById(closeBtnSelector);
       this.triggerElement = triggerElement;
       this.init();
   }
   init() {
       if (this.closeBtn) { this.closeBtn.addEventListener('click', () => this.close()) }
       if (this.closeMask) { this.closeMask.addEventListener('click', () => this.close()) }
       if (this.triggerElement) { this.triggerElement.addEventListener('click', (event) => this.togglePopup(event)) }
   }
   togglePopup() {
      this.open();
   }
   open() {
       if (this.popup) {
           this.popup.style.display = 'flex';
           this.popup.style.opacity = 0;
           let opacity = 0;
           const fadeIn = () => {
               opacity += 0.2; 
               this.popup.style.opacity = opacity;
               if (opacity < 1) {
                   requestAnimationFrame(fadeIn); 
               } else {
                   this.popup.style.opacity = 1;  
               }
           };
           requestAnimationFrame(fadeIn);  
       }
   }
   close() {
       if (this.popup) {
           let opacity = parseFloat(window.getComputedStyle(this.popup).opacity) || 1;
           const fadeOut = () => {
               opacity -= 0.2;  
               this.popup.style.opacity = opacity;
               if (opacity > 0) {
                   requestAnimationFrame(fadeOut);  
               } else {
                   this.popup.style.display = 'none';
                   if(this.templateInstance){
                     this.popup.remove();  
                   }
               }
           };
           requestAnimationFrame(fadeOut); 
       }
   }
}
