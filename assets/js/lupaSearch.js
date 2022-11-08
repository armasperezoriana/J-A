document.querySelector("#lupa").onkeyup = function(){
          $TableFilter("#sidebar", this.value);
          }
          
          $TableFilter = function(id, value){
              var rows = document.querySelectorAll(id + ' ul li');
              
              for(var i = 0; i < rows.length; i++){ 


                  var see = document.getElementById('sidebar');

                  var showRow = false;
                  
                  var row = rows[i];
                  row.style.display = 'none';
                  see.style.display = '';
                  
                  for(var x = 0; x < row.childElementCount; x++){
                      if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                          showRow = true;
                          break;
                      }
                  }
                  
                  if(showRow){
                      row.style.display = null;
                  }

                  if ($('#lupa').val().length == 0) {
                  
                    

                  
                  }

              }
          }

