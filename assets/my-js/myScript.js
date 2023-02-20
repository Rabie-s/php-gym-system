const price = location.search.split('price=')[1];
const months = document.getElementById('months');
const discount = document.getElementById('discount');
const totalAmount = document.getElementById('total');

//month calculation in add subscribers(addSubscribers.php)
months.addEventListener("change", function () {

    let tot = price * months.value * (100 - discount.value) / 100;
    totalAmount.textContent = 'Total amount: ' + tot.toPrecision(4) + '$';

})

//discount calculation in add subscribers(addSubscribers.php)
discount.addEventListener("change", function () {
    let tot = price * months.value * (100 - discount.value) / 100;
    totalAmount.textContent = 'Total amount: ' + tot.toPrecision(4) + '$';

})




