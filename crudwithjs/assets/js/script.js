const form = document.querySelector('#form');


form.addEventListener('submit',function(e){
   e.preventDefault();

   formData = new FormData(this);
   const data = Object.fromEntries(formData.entries());

   fetch('create.php',{
    method:'POST', 
    headers:{
        'Content-Type':'application/json'
    },
    body: JSON.stringify(data)
   })
   .then(response => response.json())
   .then(data => {
    console.log(data);
   })
   .catch(error => {
    console.log('Error:',error);
   });


});