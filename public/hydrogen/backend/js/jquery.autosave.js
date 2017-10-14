(function($){
$.fn.autosave=function(prefix){

		var locstr=localStorage;
		var selform=$(this);
		if(!prefix){
			prefix=selform.attr("id");
		
		}
		prefix+=">";
		
		function save(){
			selform.find("input:not(:password,:submit)").each(function(index,element){
			//alert(element);
			var key=prefix+element.name;
			locstr.setItem(key,$(element).val());
			
			});
		}
		function restore(){
		/*var k,v;
		for(var i=0;i<localStorage.length;i++){
		k=localStorage.key(i);
		v=localStorage.getItem(k);
		kn=k.match(/[^>]*$/);
		selform.("input:"+kn).val(v);
		
		//$("#values").append();
		}
		*/
		selform.find("input:not(:password,:submit)").each(function(index,element){
			//alert(element);
			var key=prefix+element.name;
			$(element).val(locstr.getItem(key));
			
			});
		
		}
		function clear(){
		localStorage.clear();
		}

		selform.change(save);
		selform.submit(clear);
		restore();
		
		
		
}


})(jQuery);