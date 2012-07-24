/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function jump(address) {
    window.location.href = address;
}
           
function showdiv(id) {
    if (document.getElementById(id).style.display == 'block') {
        document.getElementById(id).style.display='none';
    } else {
        document.getElementById(id).style.display='block';
    }
}
            
