jQuery(document).ready(function() {
 jQuery("input").removeProp("size");	

jQuery( "#my_select_plan" ).change(function () {
jQuery("#my_select_plan_two option:selected").removeAttr("selected");
jQuery("#my_select_plan_three option:selected").removeAttr("selected");
jQuery("#my_select_plan_four option:selected").removeAttr("selected");
jQuery("#my-select-five option:selected").removeAttr("selected");
jQuery("#my-select-six option:selected").removeAttr("selected");
});

jQuery( "#my_select_plan_two" ).change(function () {
jQuery("#my_select_plan option:selected").removeAttr("selected"); 
jQuery("#my_select_plan_three option:selected").removeAttr("selected");
jQuery("#my_select_plan_four option:selected").removeAttr("selected");
jQuery("#my-select-five option:selected").removeAttr("selected");
jQuery("#my-select-six option:selected").removeAttr("selected");
});   

jQuery( "#my_select_plan_three" ).change(function () {
jQuery("#my_select_plan option:selected").removeAttr("selected"); 
jQuery("#my_select_plan_two option:selected").removeAttr("selected");
jQuery("#my_select_plan_four option:selected").removeAttr("selected");
jQuery("#my-select-five option:selected").removeAttr("selected");
jQuery("#my-select-six option:selected").removeAttr("selected");
}); 



jQuery( "#my_select_plan_four" ).change(function () {
jQuery("#my_select_plan option:selected").removeAttr("selected"); 
jQuery("#my_select_plan_two option:selected").removeAttr("selected");
jQuery("#my_select_plan_three option:selected").removeAttr("selected");
jQuery("#my-select-five option:selected").removeAttr("selected");
jQuery("#my-select-six option:selected").removeAttr("selected");
}); 


jQuery("#my-select-five" ).change(function () {
jQuery("#my_select_plan option:selected").removeAttr("selected"); 
jQuery("#my_select_plan_two option:selected").removeAttr("selected");
jQuery("#my_select_plan_three option:selected").removeAttr("selected");
jQuery("#my_select_plan_four option:selected").removeAttr("selected");
jQuery("#my-select-six option:selected").removeAttr("selected");
});


jQuery("#my-select-six" ).change(function () {
jQuery("#my_select_plan option:selected").removeAttr("selected"); 
jQuery("#my_select_plan_two option:selected").removeAttr("selected");
jQuery("#my_select_plan_three option:selected").removeAttr("selected");
jQuery("#my_select_plan_four option:selected").removeAttr("selected");
jQuery("#my-select-five option:selected").removeAttr("selected");
});

   
});