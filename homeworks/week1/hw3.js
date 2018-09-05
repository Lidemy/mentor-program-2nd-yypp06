function String(str) {
  splitString = str.split('');  
  arr = [];
  a = splitString.length - 1; 
  for (i = a; i > -1; i--) { 
    arr.push(splitString[i]);
    
  }
  str = arr.join('');
  return str;
}

console.log(String('goodday'));
