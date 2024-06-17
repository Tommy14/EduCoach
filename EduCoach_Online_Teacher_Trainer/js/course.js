
function validatePrice() {

    var price = document.getElementById("price").value;  

    var priceValue = price.trim();
    var priceRegex = /^\d+(\.\d{1,2})?$/;

    if (!priceRegex.test(priceValue)) {
        alert("Price must be a valid integer or float (e.g., 10 or 10.99)");
    } else if (parseFloat(priceValue) === 0) {
        alert('Price cannot be zero');
    } 
  
    return true;

}