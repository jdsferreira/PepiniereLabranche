
function darkModeFunction(){
    var element=document.body;
    element.classList.toggle("darkmode");
}
function bigImg(x) {
    x.style.height = "550px";
    x.style.width = "550px";
  }
  
  function normalImg(x) {
    x.style.height = "400px";
    x.style.width = "400px";
  }

  function checkDelete(){
    return confirm('Etes vous sur de vouloir supprimer?');
}
