function join(str, concatStr) {
  let newStr = str[0]; 
  for (i = 0; i < str.length; i++){
    newStr += concatStr + str[i]
  }
  return newStr
 }
 console.log(join([1,2,3],'!'))
 console.log(join([1,2,3],'a'))
   
    
    
function repeat(str, times) {
  let newStr = str[0]; 
  for (i = 0; i < times; i++){
    newStr += str
  }
  return newStr 
 }

console.log(repeat('a',5))
console.log(repeat('yoyoyo',5))
