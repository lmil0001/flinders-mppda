/* 
 * 
 * @summary
 * Enter summary text here.
 * @author Tim Cavanagh
 * @email timcavanagh@threefin.com.au
 * @Silverstripe version 2.4.2
 * 
 * @history
 * 20/11/2010    Clears the search value in the text input
 */
function clearField(form) {
        jQuery(form).find("input.text").each(function(){
            this.defaultValue = 'Site Search';
            jQuery(this).click(function(){
                if(this.value == this.defaultValue){
                    jQuery(this).val("");
                }
                return false;
            });
            jQuery(this).blur(function(){
                if(this.value == ""){
                    jQuery(this).val(this.defaultValue);
                }
            });
        });
}


