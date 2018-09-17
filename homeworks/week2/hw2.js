function alphaSwap(str) {
  let newstr = ''
  for(i = 0; i <= str.length; i++){
    if(str[i] >= 'a' && str <= 'z' ){
       newstr += str[i].toUpperCase()
    }else if(str[i] >= 'A' && str <= 'Z'){
       newstr += str[i].toLowerCase()
    }else {
       return newstr
    }  
  }
  return newstr
}
console.log(alphaSwap('Hellow'))


module.exports = alphaSwap
