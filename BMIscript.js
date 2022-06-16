function calculate(){
    // 取得變數
    const height = parseInt(document.getElementById('height').value); //parseInt()將輸入的字串轉成整數
    const weight = parseInt(document.getElementById('weight').value);
    // 輸出結果的id
    const result = document.getElementById('output');

    let height_status=false, weight_status=false;

    // 如果有地方沒有填
    if(height === '' || isNaN(height) || (height <= 0)){
        var h_text = document.getElementById("height")
        document.getElementById('height').placeholder = '    請輸入身高';
        h_text.onfocus = function(){
            if(this.placeholder == "    請輸入身高"){
                this.placeholder = "";
            }
        }
        h_text.onblur = function(){
            if(this.placeholder == ""){
                this.placeholder = "    請輸入身高";
            }
        }
    }else{
        document.getElementById('height_error').innerHTML = '';
        height_status=true;
    }

    if(weight === '' || isNaN(weight) || (weight <= 0)){
        var w_text = document.getElementById("weight")
        document.getElementById('weight').placeholder = '    請輸入體重';
        w_text.onfocus = function(){
            if(this.placeholder == "    請輸入體重"){
                this.placeholder = "";
            }
        }
        w_text.onblur = function(){
            if(this.placeholder == ""){
                this.placeholder = "    請輸入體重";
            }
        }    
    }else{
        document.getElementById('weight_error').innerHTML = '';
        weight_status=true;
    }

    // 都填寫正確，進入計算
    if(height_status && weight_status){
        // const bmi = weight / ( ( height / 100 ) ** 2 ).toFixed(2);
        const bmi = weight / ( ( height / 100 ) ** 2 ).toFixed(2);
        result.innerHTML = '你的身體質量指數(BMI)為 ' + bmi;

        
    }else{
        result.innerHTML = 'Something Error!';
    }
}

function cleanstring(){
    document.getElementById("height").value = "";
    document.getElementById("weight").value = "";    
}