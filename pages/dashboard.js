$('.button-collapse').sideNav();

$('.collapsible').collapsible();

$('select').material_select();

const sideNav = document.querySelector('.sidenav');
M.Sidenav.init(sideNav, {});

function edit(){
    document.getElementById("TextArea").readOnly = false;
   
}
function clearField(){
    document.getElementById("TextArea").value = "";
   
}
function editProfile(){
    document.getElementById("FullName").color="red";
   
}