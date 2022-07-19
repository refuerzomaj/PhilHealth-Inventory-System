document.getElementById("myUL").style.display = "none";
function stoppedTyping(){
    var input = document.getElementById("iID-req").value;
          if(input.length > 0) { 
              document.getElementById("myUL").style.display = "block"; 
          } else { 
              document.getElementById("myUL").style.display = "none";
          }
      }