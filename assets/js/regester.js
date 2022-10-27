const inputs = document.querySelectorAll("input");

const patterns = {
  username: /^[a-z\d]{5,12}$/i,
  password: /^[\d\w@-]{8,20}$/i,
  phone: /^\d{3}-\d{3}-\d{4}$/,
};

inputs.forEach((input) => {
  input.addEventListener("keyup", (e) => {
    validate(e.target, patterns[e.target.attributes.id.value]);
  });
});

function validate(field, regex) {
  if (regex.test(field.value)) {
    field.className = "form-control valid";
  } else {
    field.className = "form-control invalid";
  }
}

// const elementRegex = {
//   userName: /^[a-zA-Z]{3,}$/,
//   password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/,
//   phone: /01[0125][0-9]{8}$/,
// };

// window.onload = function () {
//   const elements = document.querySelectorAll("input");
//   elements.forEach((element) => {
//     element.oninput = (e) => {
//       if (e.target.value.match(elementRegex[element.id])) {
//         element.className = "form-control is-valid";
//       } else {
//         element.className = "form-control is-invalid";
//       }
//     };
//   });
// };
