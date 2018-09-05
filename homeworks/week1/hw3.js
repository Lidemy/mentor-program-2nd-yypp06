function String(str) {
  let splitString = str.split('');  
  let arr = [];
  let a = splitString.length - 1; 
  for (i = a; i > -1; i--) { 
    arr.push(splitString[i]);
    
  }
  let str = arr.join('');
  return str;
}

console.log(String('goodday'));
