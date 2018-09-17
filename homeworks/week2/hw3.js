function isPrime(n) {
  let primeArray = []
  for(i=2; i<=n; i++){
    if(n%i === 0 ){
      primeArray.push(i)
    }
  }
  if(primeArray.length < 2){
    console.log(true)
  }else{
    console.log(false)
   } 
}
isPrime(39)   


module.exports = isPrime
