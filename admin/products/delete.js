let deletbtns = document.querySelectorAll('.delete');
// console.log(deletbtns);
deletbtns.forEach((btn) => btn.addEventListener('click', delete_product));


function delete_product() {
  const id = this.dataset.id;
      console.log(id)
  fetch(`http://localhost/last-cafe/admin/products/delete.php?id=${id}`)
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      if (data) {
        let btn = document.querySelector(`.delete[data-id='${id}']`);
        btn.parentElement.parentElement.remove();
      }
    });
}