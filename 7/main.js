let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
function isEven(num) {
    for(let i =0;i < num.length; i++ ){
      if(num[i]%2 == 0){
    
    console.log(num[i] + 'は偶数です');}
  }}

isEven(numbers);

class Car {

  //コンストラクタ
  constructor(gasoline, number) {
      this.gasoline = gasoline;
      this.number = number;
  }

getNumGas(){
  console.log(`ガソリンは${this.gasoline}です。ナンバーは${this.number}です`)
}}

let car1 = new Car(`レギュラー`,3);
car1.getNumGas();
