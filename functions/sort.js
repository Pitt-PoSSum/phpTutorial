function insertionSort(array) {
    // Only change code below this line
    var isSort = false;
    var temp=false;
    do{
        isSort=true;
        for(var i=0;i<array.length;i++){
            if(i>0 && array[i]<array[0]){
                temp = array[i];
                for(var z=i;z>0;z--){
                    array[z] = array[z-1];
                }
                array[0]=temp;
                isSort=false;
            }
        }
    }while(!isSort);
    return array;
    // Only change code above this line
}

function bubbleSort(array) {
    // Only change code below this line
    var isSort = false;
    var temp=false;
    do{
        isSort=true;
        for(var i=0;i<array.length;i++){
            if(i+1 <= array.length && array[i]>array[i+1]){
                temp = array[i];
                array[i] = array[i+1];
                array[i+1] = temp;
                isSort=false;
            }
        }
    }while(!isSort);
    return array;
    // Only change code above this line
}

function selectionSort(array) {
    // Only change code below this line
    var tempLeast=false;
    var tempGreatest=false;
    var isSort = false;
    var temp=false;
    var start=0;
    var end=array.length-1

    do{
        isSort=true;
        tempLeast=false;
        tempGreatest=false;
        for(var i=start;i<=end;i++){
            if(i==start){
                tempLeast=start;
                tempGreatest=end;
            }else{
                if(array[i]<array[tempLeast]) {
                    tempLeast = i;
                    isSort=false;
                }
                if(array[i]>array[tempGreatest]) {
                    tempGreatest = i;
                    isSort=false;
                }
            }
        }

        if(!isSort){
            temp = array[start];
            array[start] = array[tempLeast];
            array[tempLeast] = temp;

            temp = array[end];
            array[end] = array[tempGreatest];
            array[tempGreatest] = temp;
            isSort=false;
            start++;
            end--;
        }
    }while(!isSort);
    return array;
    // Only change code above this line
}