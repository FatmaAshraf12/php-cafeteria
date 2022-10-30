let deletbtns=document.querySelectorAll('.delete');
console.log(deletbtns);
deletbtns.forEach((btn) => btn.addEventListener('click',delete_user));


function delete_user(){
   const id=this.dataset.id;
//    console.log(id);
    fetch(`http://localhost/iti/php-cafatiria/delete_user.php?id=${id}`)
  .then((response) => response.json())
  .then((data) => {
      if (data) {
        let btn=document.querySelector(`button[data-id='${id}']`);
        btn.parentElement.parentElement.remove();
      }
  });
}