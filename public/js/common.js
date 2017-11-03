function readURL1(input) { 

  if (input.files && input.files[0]) { 
    var reader = new FileReader(); 

    reader.onload = function(e) { 
      var field = document.getElementById('image1'); 
      field.setAttribute('src', e.target.result); 
    }; 

    reader.readAsDataURL(input.files[0]); 
  } 
} 

$("#imgInput1").change(function() { 
  readURL1(this); 
}); 

function readURL2(input) { 

  if (input.files && input.files[0]) { 
    var reader = new FileReader(); 

    reader.onload = function(e) { 
      var field = document.getElementById('image2'); 
      field.setAttribute('src', e.target.result); 
    }; 

    reader.readAsDataURL(input.files[0]); 
  } 
} 

$("#imgInput2").change(function() { 
  readURL2(this); 
}); 

function readURL3(input) { 

  if (input.files && input.files[0]) { 
    var reader = new FileReader(); 

    reader.onload = function(e) { 
      var field = document.getElementById('image3'); 
      field.setAttribute('src', e.target.result); 
    }; 

    reader.readAsDataURL(input.files[0]); 
  } 
} 

$("#imgInput3").change(function() { 
  readURL3(this); 
});
