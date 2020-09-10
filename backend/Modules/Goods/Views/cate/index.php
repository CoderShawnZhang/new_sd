<div class="voiceinator">

    <select name="voice" id="voices">
        <option value="">Select A Voice</option>
    </select>

    <label for="rate">Rate:</label>
    <input name="rate" type="range" min="0" max="3" value="1" step="0.1">

    <label for="pitch">Pitch:</label>
    <input name="pitch" type="range" min="0" max="2" step="0.1">

    <textarea name="text">你好 给你点?</textarea>

    <button id="stop">Stop!</button>
    <button id="speak">Speak</button>
</div>

<!-------------------------------------------资源文件------------------------------------------->
<!--引入javascript-->
<?php $this->registerJs($this->render("/javascript/cate.js"),yii\web\View::POS_END); ?>
<!--引入css-->
