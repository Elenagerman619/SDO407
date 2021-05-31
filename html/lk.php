<?php session_start()?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 
<script src="https://kit.fontawesome.com/c8a7711137.js" crossorigin="anonymous"></script>
 
    <title>Личный кабинет</title>
 
    <style> 
    
     #but {
           
           background: rgb(0, 174, 255);
           position: relative;
           left: 50px;
           top: 3px;
         }
    
    .my_class {
        position: absolute;
          top: 250px;
          left: 130px;
          background-color: rgb(179, 233, 243);
    }
 
    .lk {
        font-size: 20px;
        position: absolute;
        left: 450px;
    }
 
    .edit-btn {
        color: #de3545;
        cursor: pointer;
    }
 
    .edit-btn:hover {
        color: darkgrey;
    }
 
    .save-btn {
        color: green;
        cursor: pointer;
    }
 
    .cancel-btn {
        color: blue;
        cursor: pointer; 
    }
 
    </style>
  </head>
  <body>
    
    <a href ="http://a0528167.xsph.ru/mainpage.html">Выйти из личного кабинета</a>
 
    <div class="container lk">
 
<p>Имя: <span><?= $_SESSION['name'] ?></span>
<span class="edit-btn">[Изменить]</span>
<span class="save-btn" hidden data-item="name">[Сохранить]</span>
<span class="cancel-btn" hidden>[Отменить]</span>
</p>


 
<p>Фамилия: <span><?= $_SESSION['lastname'] ?></span>
<span class="edit-btn">[Изменить]</span>
<span class="save-btn" hidden data-item="lastname">[Сохранить]</span>
<span class="cancel-btn" hidden>[Отменить]</span>
</p>
 
<p>E-mail: <?= $_SESSION['email'] ?></p>
<p>Id: <?= $_SESSION['id'] ?></p>
 
    </div>
    
    
    
     <div class="container my_class">
  
 
      <form>
        <div class="form-row" id="podbor">
          <label for="podbor">Подбор тура</label>
 
          <div class="col-md-2">
            
            <select class="custom-select" id="inputGroupSelect01">
              <option selected>Город вылета...</option>
              <option value="1">Москва</option>
              <option value="2">Санкт-Петербург</option>
              <option value="3">Ростов на Дону</option>
            </select>
          </div>
          <div class="col-md-2">
            <select class="custom-select" id="inputGroupSelect01">
              <option selected>Страна...</option>
              <option value="1">Чехия</option>
              <option value="2">Италия</option>
              <option value="3">Испания</option>
              <option value="3">Франция</option>
              <option value="3">Кипр</option>
            </select>
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" placeholder="Дата начала">
          </div>
          <div class="col-md-1">
            <input type="text" class="form-control" placeholder="Ночей">
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" placeholder="Туристы">
          </div>
          <div class="col-md-1">
          <button onclick="" id="but">Поиск <i class="fas fa-search" style="color: darkorchid;"></i></button>
          
        </div>
        </div>
      </form>
  </div>
  
  
  
  
  
 
    <script> 
 
    let edit_buttons = document.querySelectorAll(".edit-btn");
    let save_buttons = document.querySelectorAll(".save-btn");
    let cancel_buttons = document.querySelectorAll(".cancel-btn");
 
    for(let i=0; i<edit_buttons.length; i++) {
        let inputValue = edit_buttons[i].previousElementSibling.innerText;
        edit_buttons[i].addEventListener("click", () => {
        edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" value="${inputValue}">`;
        save_buttons[i].hidden = false;
        cancel_buttons[i].hidden = false;
        edit_buttons[i].hidden = true;
        });
 
        cancel_buttons[i].addEventListener("click", ()=> {
        edit_buttons[i].previousElementSibling.innerText = inputValue;
        save_buttons[i].hidden = true;
        cancel_buttons[i].hidden = true;
        edit_buttons[i].hidden = false;
        });
 
        save_buttons[i].addEventListener("click", async () => {
        let newInputValue = edit_buttons[i].
        previousElementSibling.innerText = edit_buttons[i].
        previousElementSibling.firstElementChild.value;
 
        save_buttons[i].hidden = true;
        cancel_buttons[i].hidden = true;
        edit_buttons[i].hidden = false;
 
       let formData = new FormData();
       formData.append("value", newInputValue);
       formData.append("item", save_buttons[i].dataset.item);
 
       let response = await fetch('php/lk_obr.php', {
       method: 'POST',
       body: formData
     });
   });



 
    }
 
</script>
 
    <!-- Optional JavaScript; choose one of the two! -->
 
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"crossorigin="anonymous"></script>
    -->
  </body>
</html>
