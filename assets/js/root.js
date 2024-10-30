class Root {
    constructor() {
      this.page = this.displayPage(); 
    }
  
    getCurrentPage() {
      const url = window.location.href;
      const pageName = url.split('/').pop().split('?')[0];
      return pageName === "" ? "index.php" : pageName;
    }
  
    displayPage() {
      const currentPage = this.getCurrentPage();
      switch (currentPage) {
        case "catalog.php":
          return "catalog";
        
        case "collection.php":
          return "collection";
        
        case "index.php":
          return "home";
        
        default:
          return "N/A";
      }
    }
  }
  
  export default Root;
  