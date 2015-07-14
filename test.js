$(document).ready(function(){
    
    $('#login').click(function(){
        
         var trHTML = '';
        
        
         currentcount = $('#rowcount').val();
               $('#rowcount').val(parseInt(currentcount)+1);
               
        
        trHTML += '<tr id='+$('#rowcount').val()+'><td>' + $('#userid').val() +  '</td><td>' + $('#userid').val()   +'</td><td> <input type="button" id="delete" value="delete" name="delete"/></td></tr>';
              
             $('#logintable').append(trHTML);
            $('#logintable').load(); 
        
    });
     $("#logintable").delegate("tr.rows", "click", function(){
        alert("Click!");
    });
  /*  $('#logintable').on('click', 'button', function () {
    $(this).closest('tr').remove(); 
});
    
    function calldelete(id){
        alert("hello");
         $('table#logintable tr#'+id).remove();
}
*/
    
});  