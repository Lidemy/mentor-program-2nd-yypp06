function stars(n) {
  for(let i = 1; i <=n; i++){
    let newStar = '';
    for(let j = 1; j <=i; j++){
      newStar += '*'  
    }
    let starArray = newStar.split(',')
    console.log(starArray)
  }
}
stars(3);


module.exports = stars;
