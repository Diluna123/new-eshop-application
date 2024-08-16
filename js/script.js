// my functions
function changForm() {
  const signin = document.getElementById("signin");
  const signup = document.getElementById("signup");

  signin.classList.toggle("move");
  signup.classList.toggle("move1");
}
function changForm2() {
  const signin = document.getElementById("signin");
  const forgotPs = document.getElementById("forgotPs");

  signin.classList.toggle("moveR");
  forgotPs.classList.toggle("move2");
}
function forgotPs() {
  const email = document.getElementById("fps-email");
  const alertBox = document.getElementById("alert-d-forgotPs");
  const loadingve = document.getElementById("loading-ve");

  loadingve.className = "loading  d-flex justify-content-center";

  const form = new FormData();
  form.append("email", email.value);

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        changForm3();
        loadingve.className = "d-none";

        alertBox.className = "d-none";
      } else {
        alertBox.className = "alert alert-danger d-block";
        loadingve.className = "d-none";

        alertBox.innerHTML = this.responseText;
      }
    }
  };
  request.open("POST", "forgotPsProcess.php", true);
  request.send(form);
}

function changForm3() {
  const forgotPs = document.getElementById("forgotPs");
  const fverify = document.getElementById("forgotPsverification");

  forgotPs.classList.toggle("moveLeft");
  fverify.classList.toggle("move3");
}

function changForm4() {
  const fverify = document.getElementById("forgotPsverification");
  const addNewPs = document.getElementById("addNewPs");
  fverify.classList.toggle("moveLeft2");

  addNewPs.classList.toggle("move4");
}

function enebleBtn() {
  const checkbox2 = document.getElementById("checkbox2");
  const signupBtn = document.getElementById("signupBtn");

  if (!checkbox2.checked) {
    signupBtn.className = "btn btn-warning mt-3 col-12 disabled";
  } else {
    signupBtn.className = "btn btn-warning mt-3 col-12";
  }
}

function signup() {
  const signin = document.getElementById("signin");
  const signup = document.getElementById("signup");
  const innerForm = document.getElementById("inner-form");
  const fname = document.getElementById("fname");
  const lname = document.getElementById("lname");
  const mobile = document.getElementById("mobile");
  const email = document.getElementById("mail");
  const password1 = document.getElementById("psd1");
  const passwordConfirm = document.getElementById("psd2");
  const formSignup = document.getElementById("form-signup");
  const loading = document.getElementById("loading");
  const checkbox2 = document.getElementById("checkbox2");

  innerForm.className = "d-none";
  loading.className = "loading text-center d-block";

  const form = new FormData();
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("email", email.value);
  form.append("password1", password1.value);
  form.append("passC", passwordConfirm.value);

  const request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        loading.className = "d-none";
        innerForm.className = "d-block";

        signin.classList.remove("move");
        signup.classList.remove("move1");
        fname.value = "";
        lname.value = "";
        mobile.value = "";
        email.value = "";
        password1.value = "";
        passwordConfirm.value = "";
        if (checkbox2.checked) {
          checkbox2.checked = false;
        }
      } else {
        alert(this.responseText);

        loading.className = "d-none";
        innerForm.className = "d-block";
      }
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(form);
}

function signIn() {
  const email = document.getElementById("l-email").value;
  const password = document.getElementById("l-psw").value;
  const checkbox = document.getElementById("checkbox");
  const alertbox = document.getElementById("alert-d");

  const form = new FormData();
  form.append("email", email);
  form.append("password", password);
  form.append("cResults", checkbox.checked);

  const request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "index.php";
      } else {
        alertbox.className = "alert alert-danger alert-dismissible fade show";
        alertbox.innerHTML = "Error: " + this.responseText;
      }
    }
  };
  request.open("POST", "signInProcess.php", true);
  request.send(form);
}

function hideAlert() {
  const alertbox = document.getElementById("alert-d");
  alertbox.className = "d-none";
}
// changForm4();

function verify() {
  const email = document.getElementById("fps-email").value;
  const vCode = document.getElementById("ve-code").value;

  const alertBox = document.getElementById("alert-d-verify");
  const form = new FormData();
  form.append("usermail", email);
  form.append("vCode", vCode);
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        changForm4();
        alertBox.className = "d-none";
      } else {
        alertBox.className = "alert alert-danger d-block";
        alertBox.innerHTML = this.responseText;
      }
    }
  };
  request.open("POST", "verifyProcess.php", true);
  request.send(form);
}

function changPs() {
  const nPs = document.getElementById("newPsw").value;
  const cnPs = document.getElementById("cnewPsw").value;
  const email = document.getElementById("fps-email").value;
  const alertBox = document.getElementById("alert-d-changps");

  const form = new FormData();

  form.append("nPs", nPs);
  form.append("cnPs", cnPs);
  form.append("email", email);
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        alertBox.className = "alert alert-success d-block";
        alertBox.innerHTML = "Password changed successfully";

        window.location.reload();
      } else {
        alert(this.responseText);
        alertBox.className = "lert alert-danger d-block";
        alertBox.innerHTML = this.responseText;
      }
    }
  };
  request.open("POST", "changePswProcess.php", true);
  request.send(form);
}
var addModal;
function openAddProductModal() {
  const modal = document.getElementById("addProduct");
  addModal = new bootstrap.Modal(modal);
  addModal.show();
}

var updateModal;
function openUpdateProductModal(pId) {
  const modal = document.getElementById("UpdateProduct");
  updateModal = new bootstrap.Modal(modal);
  updateModal.show();
  const modalBody = document.getElementById("modelUpdateBody");

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      modalBody.innerHTML = this.responseText;
    }
  };
  req.open("GET", "updateLoadProductProcess.php?pid=" + pId, true);
  req.send();
}

function loadFile() {
  const imageInput = document.getElementById("propImageS");
  const imgTag = document.getElementById("propImageP");
  const files = imageInput.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgTag.style.display = "block";
      imgTag.innerHTML = "";
      imgTag.innerHTML =
        '<img src="' + this.result + '" class="img-fluid rounded-3" />';
    });
  }
}
function loadFileU() {
  const imageInput = document.getElementById("propImageSU");
  const imgTag = document.getElementById("propImagePU");
  const files = imageInput.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgTag.style.display = "block";
      imgTag.innerHTML = "";
      imgTag.innerHTML =
        '<img src="' + this.result + '" class="img-fluid rounded-3" />';
    });
  }
}
$(document).ready(function () {
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });

  $("a[data-content]").on("click", function (e) {
    e.preventDefault();
    var contentId = $(this).data("content");
    $(".content-section").addClass("d-none");
    $("#" + contentId).removeClass("d-none");

    // Reinitialize chart if Home is clicked
    if (contentId === "home") {
      initializeChart();
    }
  });

  function initializeChart() {
    var ctx = document.getElementById("salesChart").getContext("2d");
    var salesChart = new Chart(ctx, {
      type: "line",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
        ],
        datasets: [
          {
            label: "Sales",
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  }

  // Initialize the dashboard content and chart on page load
  $("#home").removeClass("d-none");
  initializeChart();
});

function addProduct() {
  const pTitle = document.getElementById("p_ti");
  const pCat = document.getElementById("p_cat");
  const pBrand = document.getElementById("p_brand");
  const pQty = document.getElementById("p_qty");
  const pPrice = document.getElementById("p_price");
  const pDesc = document.getElementById("p_dis");
  const dCost = document.getElementById("d_cost");
  const p_image = document.getElementById("propImageS");
  const imageP = document.getElementById("propImageP");

  const form = new FormData();
  form.append("pTitle", pTitle.value);
  form.append("pCat", pCat.value);
  form.append("pBrand", pBrand.value);
  form.append("pQty", pQty.value);
  form.append("pPrice", pPrice.value);
  form.append("pDesc", pDesc.value);
  form.append("dCost", dCost.value);
  form.append("pi", p_image.files[0]);

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        Swal.fire({
          icon: "success",
          title: "Product Added Successfully",
          showConfirmButton: false,
          timer: 1500,
        });
        $("#mytb-products").load(location.href + " #mytb-products");
        pTitle.value = "";
        pBrand.value = "00";
        pCat.value = "00";
        pDesc.value = "";
        dCost.value = "";
        pQty.value = "";
        pPrice.value = "";
        p_image.value = "";
        imageP.innerHTML =
          '<img src="img/img-ng.png" class="img-fluid rounded-3" id="" alt="Responsive image">';

        addModal.hide();
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: this.responseText,
        });
      }
    }
  };
  req.open("POST", "addProductProcess.php", true);
  req.send(form);
}

function updateProductStatus(propId) {
  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        $("#mytb-products").load(location.href + " #mytb-products");
      } else {
        alert(this.responseText);
      }
    }
  };
  req.open("GET", "updateProductStatus.php?pid=" + propId + "", true);
  req.send();
}

function addCatogery() {
  const newCatName = document.getElementById("newCat");

  const form = new FormData();

  form.append("newCat", newCatName.value);

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        $("#newCatDiv").load(location.href + " #newCatDiv");
        newCatName.value = "";
        Swal.fire({
          icon: "success",
          title: "New Catogery Added Successfully",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        alert(this.responseText);
      }
    }
  };
  req.open("POST", "addCatogeryProcess.php", true);
  req.send(form);
}

function addBrand() {
  const newBrandName = document.getElementById("newBrandName");

  const form = new FormData();

  form.append("newBrandName", newBrandName.value);

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        $("#newBrandDiv").load(location.href + " #newBrandDiv");
        newBrandName.value = "";
        Swal.fire({
          icon: "success",
          title: "New Brand Added Successfully",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        alert(this.responseText);
      }
    }
  };
  req.open("POST", "addBrandProcess.php", true);
  req.send(form);
}
function addColour() {
  const newColour = document.getElementById("newColourName");

  const form = new FormData();
  form.append("newColour", newColour.value);
  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        $("#newColorDiv").load(location.href + " #newColorDiv");
        newColour.value = "";
        Swal.fire({
          icon: "success",
          title: "New Colour Added Successfully",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        alert(this.responseText);
      }
    }
  };
  req.open("POST", "addColourProcess.php", true);
  req.send(form);
}

function updateProduct() {
  const pId = document.getElementById("p_IdU");
  const pTitle = document.getElementById("p_tiU");
  const pCat = document.getElementById("p_catU");
  const pBrand = document.getElementById("p_brandU");
  const pQty = document.getElementById("p_qtyU");
  const pPrice = document.getElementById("p_priceU");
  const pDesc = document.getElementById("p_disU");
  const dCost = document.getElementById("d_costU");
  const p_image = document.getElementById("propImageSU");
  const imageP = document.getElementById("propImagePU");

  const form = new FormData();

  form.append("pId", pId.value);
  form.append("pTitle", pTitle.value);
  form.append("pCat", pCat.value);
  form.append("pBrand", pBrand.value);
  form.append("pQty", pQty.value);
  form.append("pPrice", pPrice.value);
  form.append("pDesc", pDesc.value);
  form.append("dCost", dCost.value);

  if (p_image.files.length > 0) {
    form.append("pi", p_image.files[0]);
  }

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        Swal.fire({
          icon: "success",
          title: "Product Updated Successfully",
          showConfirmButton: false,
          timer: 1500,
        });
        $("#mytb-products").load(location.href + " #mytb-products");
        pId.value = "";
        pTitle.value = "";
        pBrand.value = "00";
        pCat.value = "00";
        pDesc.value = "";
        dCost.value = "";
        pQty.value = "";
        pPrice.value = "";
        p_image.value = "";
        imageP.innerHTML =
          '<img src="img/img-ng.png" class="img-fluid rounded-3" id="" alt="Responsive image">';
        updateModal.hide();
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: this.responseText,
        });
      }
    }
  };
  req.open("POST", "updateProductProcess.php", true);
  req.send(form);
}

function privewProduct(pid) {
  const canBody = document.getElementById("canBody");

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      canBody.innerHTML = this.responseText;
    }
  };
  req.open("GET", "privewProductProcess.php?pid=" + pid, true);
  req.send();
}

function searchAdProduct(cid) {
  const adDiv = document.getElementById("AdProducts");

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      adDiv.innerHTML = this.responseText;
    }
  };
  req.open("GET", "SearchAdProductProcess.php?cid=" + cid, true);
  req.send();
}
function signOut() {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var res = req.responseText;
      if (res == "success") {
        window.location.reload();
      } else {
        alert(res);
      }
    }
  };
  req.open("GET", "signoutProcess.php", true);
  req.send();
}

function updateUserProfile() {
  const fname = document.getElementById("fname_p");
  const lname = document.getElementById("lname_p");
  const mobile = document.getElementById("mobile_p");
  const adress = document.getElementById("address");
  const prov = document.getElementById("province");
  const distric = document.getElementById("distric");
  const city = document.getElementById("city");
  const zip = document.getElementById("zip");
  const edImg = document.getElementById("ed-img");

  const form = new FormData();

  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("adress", adress.value);
  form.append("prov", prov.value);
  form.append("distric", distric.value);
  form.append("city", city.value);
  form.append("zip", zip.value);
  form.append("edImg", edImg.files[0]);

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        Swal.fire({
          icon: "success",
          title: "Profile Updated Successfully",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: this.responseText,
        });
      }
    }
  };
  req.open("POST", "updateProfileProcess.php", true);
  req.send(form);
}

function priviewImg() {
  const img = document.getElementById("ed-img");

  img.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);
    document.getElementById("proimg").src = url;
  };
}
function searchProductsIndex() {
  const searchInput = document.getElementById("search");

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;

      document.getElementById("searchResult").innerHTML = res;
    }
  };
  req.open("GET", "searchProcess.php?search=" + searchInput.value, true);
  req.send();
}

function addToWishlist(pid) {
  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        Swal.fire({
          icon: "success",
          title: "Profile Updated Successfully",
          showConfirmButton: false,
          timer: 1500,
        });

        alert("ok");
      } else {
        alert(res);
      }
    }
  };
  req.open("GET", "addToWishlistProcess.php?pid=" + pid, true);
  req.send();
}

function increment(btnid, qty) {
  const qtyIn = document.getElementById("qtyInput" + btnid);
  if (qtyIn.value == qty) {
    return;
  } else {
    qtyIn.value = parseInt(qtyIn.value) + 1;
  }
}
function decrement(btnid) {
  const qtyIn = document.getElementById("qtyInput" + btnid);
  if (qtyIn.value == 1) {
    return;
  } else {
    qtyIn.value = parseInt(qtyIn.value) - 1;
  }
}
function deleteCart(cartId) {
  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        Swal.fire({
          icon: "success",
          title: "Cart Deleted Successfully",
          showConfirmButton: false,
          timer: 1500,
        });

        window.location.reload();
      } else {
        alert(res);
      }
    }
  };
  req.open("GET", "deleteCartProcess.php?cartId=" + cartId, true);
  req.send();
}

var myModal;
function addToCart(pid) {
  const req = new XMLHttpRequest();
  myModal = new bootstrap.Modal(document.getElementById("cartModal"), focus);
  myModal.show();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      document.getElementById("cartcontent").innerHTML = res;
    }
  };
  req.open("GET", "addToCartModalLoading.php?pid=" + pid, true);
  req.send();
}

function plus(qty) {
  const input1 = document.getElementById("cartInputQty");

  if (input1.value == qty) {
    return;
  } else {
    input1.value = parseInt(input1.value) + 1;
  }
}
function plus2(qty) {
  const input1 = document.getElementById("cartInputQty2");

  if (input1.value == qty) {
    return;
  } else {
    input1.value = parseInt(input1.value) + 1;
  }
}

function minus() {
  const input = document.getElementById("cartInputQty");
  if (input.value == 1) {
    return;
  } else {
    input.value = parseInt(input.value) - 1;
  }
}
function minus2() {
  const input = document.getElementById("cartInputQty2");
  if (input.value == 1) {
    return;
  } else {
    input.value = parseInt(input.value) - 1;
  }
}
function addToCartmain(pid) {
  const qty = document.getElementById("cartInputQty").value;
  const form = new FormData();
  form.append("pid", pid);
  form.append("qty", qty);

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        Swal.fire({
          icon: "success",
          title: "Product Added Successfully",
          showConfirmButton: false,
          timer: 1500,
        });

        $("#cartItems").load(location.href + " #cartItems");
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: res,
        });
      }
    }
  };
  req.open("POST", "addToCartMainProcess.php", true);
  req.send(form);
}

function updateQty(cartid, e) {
  const qty = document.getElementById("qtyInput" + e);

  const form = new FormData();
  form.append("cartid", cartid);
  form.append("qty", qty.value);

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        $("#cartItems").load(location.href + " #cartItems");
        $("#checkoutTotal").load(location.href + " #checkoutTotal");
      } else {
        alert(res);
      }
    }
  };
  req.open("POST", "updateCartQtyProcess.php", true);
  req.send(form);
}

function showAnimatedAlert(type, message) {
  var alertDiv = document.createElement("div");
  alertDiv.classList.add(
    "alert",
    "alert-" + type,
    "alert-dismissible",
    "fade",
    "show"
  );
  alertDiv.setAttribute("role", "alert");
  alertDiv.innerHTML = `
      <strong>${type === "success" ? "Success!" : "Error!"}</strong> ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  `;
  var alertContainer = document.getElementById("alert-container");
  alertContainer.innerHTML = "";
  alertContainer.appendChild(alertDiv);
  setTimeout(function () {
    alertDiv.classList.remove("show");
    setTimeout(function () {
      alertDiv.remove();
    }, 300);
  }, 2000);
}

function updateCartStatus(cartId, id) {
  const check = document.getElementById("itemCheck" + id).checked;
  const form = new FormData();
  form.append("cartId", cartId);
  form.append("check", check);

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        check.checked = true;
        window.location.reload();

        $("#checkoutTotal").load(location.href + " #checkoutTotal");
      } else {
        alert(res);
      }
    }
  };

  req.open("POST", "updateCartStatusProcess.php", true);
  req.send(form);
}

function singleProductView(pid) {
  const pidd = pid;

  window.location.href = "singleProductView.php?pid=" + pid;
}

// payment functions

function payNow(oNum, tot) {
  const form = new FormData();
  form.append("tot", tot);
  form.append("oNum", oNum);

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "paymentOptions.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: this.responseText,
        });
      }
    }
  };

  request.open("POST", "payNowProcess.php", true);
  request.send(form);
}

function buyNow(pid) {
  const cbody = document.getElementById("buyNowContent");
  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      cbody.innerHTML = this.responseText;
    }
  };
  req.open("GET", "buyNowProcess.php?pid=" + pid, true);
  req.send();
}

function orderConfirm() {
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "thankYou.php";
      } else {
        alert(this.responseText);
      }
    }
  };
  request.open("GET", "orderConfirmProcess.php", true);
  request.send();
}

function updatePaymentMethod(e) {
  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        window.location.href = "cashOnDelivery.php";
      } else {
        alert(res);
      }
    }
  };
  req.open("GET", "updatePaymentMethodProcess.php?method=" + e, true);
  req.send();
}

function payFromOders(onum) {
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "paymentOptions.php";
      } else {
        alert(this.responseText);
      }
    }
  };
  request.open("GET", "payFromOdersProcess.php?onum=" + onum, true);
  request.send();
}

function buyNowContinue(pid, onum) {
  const qty = document.getElementById("cartInputQty2");
  const form = new FormData();
  form.append("pid", pid);
  form.append("onum", onum);
  form.append("qty", qty.value);
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "paymentOptions.php";
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: this.responseText,
        });
      }
    }
  };
  request.open("POST", "buyNowContinueProcess.php", true);
  request.send(form);
}
function cardPaymentConfirm() {
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "thankYou.php";
      } else {
        alert(this.responseText);
      }
    }
  };
  request.open("GET", "cardPaymentConfirmProcess.php", true);
  request.send();
}

function cardPay(id) {
  var qty = document.getElementById("cQty").innerHTML;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.status == 200) & (request.readyState == 4)) {
      var response = request.responseText;
      console.log(response);

      var obj = JSON.parse(response);

      var mail = obj["umail"];
      var amount = obj["amount"];

      if (response == 0) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          },
        });
        Toast.fire({
          icon: "warning",
          title: "This Product Is Out Of Stock",
        });
      } else if (response == 1) {
        showAlert("Error", "Please Login.", "error").then(() => {
          window.location = "index.php";
        });
      } else if (response == 2) {
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          },
        });
        Toast.fire({
          icon: "warning",
          title: "Update Your Profile before Proceeding",
        });
      } else {
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          cardPaymentConfirm();

          showAlert(
            "Success",
            "Payment completed. OrderID:" + orderId,
            "success"
          ).then(() => {
            cardPaymentConfirm();
            saveInvoice(orderId, id, mail, amount, qty);
          });

          alert("Payment completed. OrderID:" + orderId);
          saveInvoice(orderId, id, mail, amount, qty);
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: obj["mid"], // Replace your Merchant ID
          return_url: "http://localhost/eshop/cashOndelivery.php?id=" + id, // Important
          cancel_url: "http://localhost/eshop/cashOndelivery.php?id=" + id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount + ".00",
          currency: "LKR",
          hash: obj["hash"], // *Replace with generated hash retrieved from backend
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };

  request.open("GET", "cardPaymentProcess.php?idd=" + id + "&qty=" + qty, true);
  request.send();
}

// end of payment functions

function viewFromOrders(onum) {
  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        window.location.href = "cashOndelivery.php";
      } else {
        alert(this.responseText);
      }
    }
  };
  request.open("GET", "payFromOdersProcess.php?onum=" + onum, true);
  request.send();
}

function productReview(pid, onum) {
  const url =
    "productReview.php?pid=" +
    encodeURIComponent(pid) +
    "&onum=" +
    encodeURIComponent(onum);
  window.location.href = url;
}
function addReview(pid, onum) {
  const review = document.getElementById("review");

  const form = new FormData();
  form.append("pid", pid);
  form.append("onum", onum);
  form.append("comment", review.value);

  const req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        window.location.reload();
      } else {
        alert(res);
      }
    }
  };
  req.open("POST", "productReviewProcess.php", true);
  req.send(form);
}

function blockUser(uid) {
  const re = new XMLHttpRequest();
  re.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = this.responseText;
      if (res == "success") {
        $("#userTable").load(location.href + " #userTable");
      } else {
        alert(res);
      }
    }
  };
  re.open("GET", "blockUserProcess.php?uid=" + uid, true);
  re.send();
}

// admin functions
function viewOrder(onum) {
  const offBody = document.getElementById("off-content");

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      offBody.innerHTML = this.responseText;
    }
  };
  request.open("GET", "viewOrderProcess.php?onum=" + onum, true);
  request.send();
}

function orderShipping(onum) {
  const offBody = document.getElementById("off-content");
  const loading = document.getElementById("loading");

  offBody.className = "d-none";
  loading.className =
    "loding h-100 d-flex flex-column justify-content-center align-items-center d-block";

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "success") {
        offBody.className = "d-block";
        loading.className = "d-none";
        $("#oTab").load(location.href + " #oTab");
        viewOrder(onum);
        window.print();
      } else {
        console.log(this.responseText);
      }
    }
  };
  request.open("GET", "orderShippingProcess.php?onum=" + onum, true);
  request.send();
}

function orderRecived(onum) {
  Swal.fire({
    title: "Are you sure?",
    text: "Your Order already Recived",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sure!"
  }).then((result) => {
    if (result.isConfirmed) {

      const request = new XMLHttpRequest();
      request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          if (this.responseText == "success") {
            $("#cardCont").load(location.href + " #cardCont");
            $("#oTabC").load(location.href + " #oTabC");
            Swal.fire({
              title: "Thank You!",
              text: "Your Order Recived Successfully!",
              icon: "success"
            });
            
          } else {
            console.log(this.responseText);
          }
        }
      };
      request.open("GET", "orderRecivedProcess.php?onum=" + onum, true);
      request.send();



      
    }
  });
}

function filterOrder(){
  const cat = document.getElementById("filterOrder").value; 
  const otabel = document.getElementById("newOtable");

  const request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      
      otabel.innerHTML =this.responseText;
    }
  };
  request.open("GET", "filterOrderProcess.php?cat=" + cat, true);
  request.send();
}

function viewUser(uid) {

  const viewContent = document.getElementById("viewUsreCon");

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      viewContent.innerHTML = this.responseText;
    }
  };
  req.open("GET", "viewUserProcess.php?uid=" + uid, true);
  req.send();



}
function oSearch(){
  const searchKey = document.getElementById("oSearch").value;
  const otabel = document.getElementById("newOtable");

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      
      otabel.innerHTML =this.responseText;
    }
  };
  req.open("GET", "oSearchProcess.php?searchKey=" + searchKey, true);
  req.send();
}
function uSearch(){
  const searchKey = document.getElementById("searchUser").value;
  const uTabel = document.getElementById("uTBody");

  const req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      
      uTabel.innerHTML =this.responseText;
    }
  };
  req.open("GET", "uSearchProcess.php?searchKey=" + searchKey, true);
  req.send();

}