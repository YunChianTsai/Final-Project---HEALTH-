function calculate(){
    const height = parseInt(document.getElementById('height').value); //parseInt()將輸入的字串轉成整數
    const weight = parseInt(document.getElementById('weight').value);
    const age = parseInt(document.getElementById('age').value);
    const activity = parseFloat(document.getElementById('activity').value);
    // 輸出結果的id
    const result = document.getElementById('output');
    const result_tdee = document.getElementById('output_tdee');

    var sex_var;
    let height_status=false, weight_status=false, age_status=false;

    // 如果有地方沒有填
    if(age === '' || isNaN(age) || (age <= 0)){
        var a_text = document.getElementById("age")
        document.getElementById('age').placeholder = '    請輸入年齡';
        a_text.onfocus = function(){
            if(this.placeholder == "    請輸入年齡"){
                this.placeholder = "";
            }
        }
        a_text.onblur = function(){
            if(this.placeholder == ""){
                this.placeholder = "    請輸入年齡";
            }
        }
    }else{
        document.getElementById('age_error').innerHTML = '';
        age_status=true;
    }

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

    var sex = document.getElementsByName('sex');
    for(var i = 0; i < sex.length; i++){
        if(sex[i].checked){
            sex = sex[i].value;
            break;
        }
    }

    // 都填寫正確，進入計算
    if(height_status && weight_status && age_status){
        if(sex == 1){
            sex_var = 5;
            // const bmr = (sex + (13.75 * weight) + (5.003 * height) - (age_var * age)).toFixed(2);
            const bmr = ((10 * weight) + (6.25 * height) - (5 * age) + sex_var).toFixed(2);
            result.innerHTML = '你的基礎代謝率(BMR)為' + bmr;
            const tdee = (bmr * activity).toFixed(2);
            result_tdee.innerHTML = '你的每日總消耗熱量(TDEE)為' + tdee;
        }else if(sex == 2){
            sex_var = -161;
            // const bmr = (sex + (13.75 * weight) + (5.003 * height) - (age_var * age)).toFixed(2);
            const bmr = ((10 * weight) + (6.25 * height) - (5 * age) + sex_var).toFixed(2);
            result.innerHTML = '你的基礎代謝率(BMR)為' + bmr;
            const tdee = (bmr * activity).toFixed(2);
            result_tdee.innerHTML = '你的每日總消耗熱量(TDEE)為' + tdee;
        }else{
            result.innerHTML = 'Choose!';
        }
    }else{
        result.innerHTML = 'Something Error!';
    }
}

function cleanstring(){
    const result = document.getElementById('output');
    const result_tdee = document.getElementById('output_tdee'); 

    document.getElementById("age").value = "";
    document.getElementById("height").value = "";
    document.getElementById("weight").value = "";
    document.getElementById("activity").value = "";
    document.getElementById("output").value = "";    
    document.getElementById("output_tdee").value = "";   
    result.innerHTML = "";
    result_tdee.innerHTML = "";    
}