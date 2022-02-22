$(document).ready(function(){
    $('#para').on('click','#addBtn',function(){
      $.ajax({
          'url':'todo.php',
          'method':'POST',
          'data':{'input':$('#new1').val()},
          datatype:'JSON'
      }).done(function(data){
          d=$.parseJSON(data);
          displayToDo(d);
      })
})
})
$(document).ready(function(){
    $('#incomplete-tasks').on('click','#delete',function(){
        $.ajax({
            'url':'todo.php',
            'method':'POST',
            'data':{'index-pos':$(this).data('index')},
            datatype:'JSON'
        }).done(function(data){
            d=$.parseJSON(data);
            displayToDo(d);
        })
    })
})

$(document).ready(function(){
    $('#incomplete-tasks').on('click','#edit',function(){
        var index = $(this).data('ind');
        $.ajax({
            'url':'todo.php',
            'method':'POST',
            'data':{'index-pos1':$(this).data('ind')},
            datatype:'JSON'
        }).done(function(data){
            d=$.parseJSON(data);
            text1= "";
            text1+='<input id="new1" type="text"><button id="addBtn" name="addBtn">Add</button><button id="updateBtn" data-pid='+index+'>Update</button>';
            $('#para').html(text1);
            $('#new1').val(d[index]);
            $('#addBtn').hide();
            $('#updateBtn').show();

            displayToDo(d);
        })
    })
})
$(document).ready(function(){
    $('#para').on('click','#updateBtn',function(){
        $('#add1').show();
        $('#updateBtn').hide();
        $.ajax({
            'url':'todo.php',
            'method':'POST',
            'data':{'inputUpdt':$('#new1').val(),'myIndex':$(this).data('pid')},
            datatype:'JSON'
        }).done(function(data){
            d=$.parseJSON(data);
            displayToDo(d);
        })
    })
})
$(document).ready(function(){
    $('#incomplete-tasks').on('change','#check',function(){
        $.ajax({
            'url':'todo.php',
            'method':'POST',
            'data':{'pos':$(this).data('check')},
            datatype:'JSON'
        }).done(function(data){
            d=$.parseJSON(data);
            displayToDo(d['incomplete']);
            displayComplete(d['complete']);
        })
    })
})

$(document).ready(function(){
    $('#completed-tasks').on('click','#delete1',function(){
        $.ajax({
            'url':'todo.php',
            'method':'POST',
            'data':{'index-posit':$(this).data('index1')},
            datatype:'JSON'
        }).done(function(data){
            d=$.parseJSON(data);
            displayComplete(d);
        })
    })
})
$(document).ready(function(){
    $('#completed-tasks').on('click','#edit1',function(){
        var index1=$(this).data('i');
        $.ajax({
            'url':'todo.php',
            'method':'POST',
            'data':{'index-position':$(this).data('i')},
            datatype:'JSON'
        }).done(function(data){
            d=$.parseJSON(data);
            displayComplete(d);
        })
    })
})

function displayToDo(myData) {
   var text="";
   for(var i=0;i<myData.length;i++) {
       text+='<li><input type="checkbox" data-check="'+i+'" id="check" name="check">\
       <label>'+myData[i]+'</label><input type="text"><button class="edit" id="edit" data-ind='+i+' name="editBtn">Edit</button>\
       <button  class="delete" data-index='+i+' id="delete" name="deleteBtn">Delete</button></li>\
       <input type="text" hidden name="myVal" value="'+i+'" >';
   }
   $('#incomplete-tasks').html(text);
}

function displayComplete(myData) {
    var text="";
    for(var i=0;i<myData.length;i++) {
        text+='<li><input type="checkbox" checked  name="check">\
        <label>'+myData[i]+'</label><input type="text"><button class="edit" id="edit1" data-i='+i+' name="editBtn">Edit</button>\
        <button data-index1='+i+' class="delete" id="delete1" name="deleteBtn">Delete</button></li>\
        <input type="text" hidden name="myVal" value="'+i+'" >';
    }
    $('#completed-tasks').html(text);
 }