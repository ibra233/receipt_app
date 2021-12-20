const queryInput = document.querySelector("#query-input");
const csrf = document.querySelector("input[name='_token']").value;
const url = "http://127.0.0.1:8000/queryProduct";
const list = document.querySelector(".list");
const button=document.querySelector(".addButton");
const receipt=document.querySelector(".receiptList");
const receiptAddButton=document.querySelector(".receiptAdd");
let id=[];
let products;
let counter=0;
queryInput.addEventListener('input', function (e) {
    querySender(csrf, e.target.value);
});


function querySender(csrf, value) {
    let xhr = new XMLHttpRequest();
    list.innerHTML = ""
    xhr.open("POST", url)
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.setRequestHeader("X-CSRF-TOKEN", csrf)
    let name = {
        value
    }
    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            products = JSON.parse(xhr.responseText);
            products.forEach(element => {

                list.innerHTML += `<li class="" onclick="fillInput(event)" id="${element.product_id}"> ${element.name} </li> `;


            });
        }
    }
    xhr.onerror = (err) => reject(err);
    xhr.send(JSON.stringify(name));

}
function fillInput({target}){
    
    let value=target.innerHTML;
    let valueId=target.getAttribute("id");
    queryInput.value=value;
    queryInput.setAttribute("id",valueId);
    button.classList.add("active");
}

button.addEventListener("click",function(e){
    
    if(this.classList.contains("active")){
      
            this.classList.remove("active");
            receipt.innerHTML+=`<tr>
            <td class="productIds">${queryInput.getAttribute('id')}</td>
            <td>${queryInput.value}</td>
          </tr>`
            queryInput.value="";
            list.innerHTML="";
        
    }
});
window.onkeydown=function(e){
 
 
    
    if(e.isComposing||e.keyCode==40){
        
        if(list.childElementCount>=1){
            [...list.children].forEach(item=>{
                console.log(item.classList.contains('a'));
                if(item.classList.contains('current')){
                    item.classList.remove("current");
                }
            });
            list.children[counter%5].classList.add("current");
            counter++;
        }
        
    }
    if(e.keyCode==13){
        if(list.childElementCount>=1){
            let inputText=document.querySelector('.current').innerHTML;
            let inputId=document.querySelector('.current').getAttribute("id");
           
            queryInput.value=inputText;
            queryInput.setAttribute("id",inputId);
            button.classList.add("active");
        }
    }
}

receiptAddButton.addEventListener("click",function(e){
    document.querySelectorAll(".productIds").forEach(item=>{
        id.push(item.innerHTML);
    });

    //console.log(id);
    let xhr = new XMLHttpRequest();
    let form=new FormData();
    xhr.open("POST", "http://127.0.0.1:8000/addReceipt")
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.setRequestHeader("X-CSRF-TOKEN", csrf)
    form.append("id",JSON.stringify(id));
    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
       
            console.log(xhr.responseText);
        }
    }
    xhr.onerror = (err) => reject(err);
    xhr.send(form);
});