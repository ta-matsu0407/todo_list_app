const nl2br = (str) => {
    var res = str.replace(/\r\n/g, "<br>");
    res = res.replace(/(\n|\r)/g, "<br>");
    return res;
    }

    export { nl2br } // 別のファイルで使えるようにexportする

    // textarea内は、詳細表示するときに改行したい
    // phpにはbl2brメソッドがあるけどJSにはないので自作必要
