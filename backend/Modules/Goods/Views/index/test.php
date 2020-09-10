<div class="voiceinator">

    <button id="stop">Stop!</button>
    <button id="speak">Speak</button>
    <select name="voice" id="voices">
        <option value="">Select A Voice</option>
    </select>

    <label for="rate">Rate:</label>
    <input name="rate" type="range" min="0" max="3" value="1" step="0.1">

    <label for="pitch">Pitch:</label>
    <input name="pitch" type="range" min="0" max="2" step="0.1">

    <textarea name="text">支付宝到账，1个亿</textarea>

</div>

<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/cate.js"),yii\web\View::POS_END); ?>
<!--引入css-->
