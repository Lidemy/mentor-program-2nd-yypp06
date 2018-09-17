function isPalindromes(str) {
  let splitString = str.split('');
  let reverseStr =  splitString.reverse('');
  let joinString = reverseStr.join('');

  if ( str == joinString) {
      console.log(true)
  }else{
      console.log(false)
  }
}
isPalindromes('111111')
isPalindromes('lalalal')
isPalindromes('543212345')  
isPalindromes('lslsls')


module.exports = isPalindromes
