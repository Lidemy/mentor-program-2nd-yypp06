function capitalize(str) {
  var str = str.toLowerCase();
  var strarr = str.split(' ');
  var result = '';
    for(var i in strarr){
      result += strarr[i].substring(0,1).toUpperCase()+strarr[i].substring(1)+' ';
    }
  return result
}
console.log(capitalize('nnnnnn'));
console.log(capitalize(',nnnnn'))
