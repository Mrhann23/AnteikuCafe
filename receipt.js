const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});

let receiptNum = Math.floor((Math.random() * 100000000) + 1);
document.getElementById("receiptNum").innerHTML = receiptNum;