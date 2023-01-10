<div class="feedback my-5 p-3">
    <h3>Queremos saber su opinión</h3>
    <input type="radio" name="feedback" id="feedback-1" onclick="updateStar()" class="fa fa-star" value="1">
    <input type="radio" name="feedback" id="feedback-2" onclick="updateStar()" class="fa fa-star" value="2">
    <input type="radio" name="feedback" id="feedback-3" onclick="updateStar()" class="fa fa-star" value="3">
    <input type="radio" name="feedback" id="feedback-4" onclick="updateStar()" class="fa fa-star" value="4">
    <input type="radio" name="feedback" id="feedback-5" onclick="updateStar()" class="fa fa-star" value="5">
    
    <div class="form-floating mt-3">
        <textarea class="form-control" placeholder="Creo que este curso..." id="feedback-textarea"></textarea>
        <label for="feedback-textarea">Opinión</label>
    </div>

    <button class="orange-button mt-3" onclick="sendFeedback(<?=$courseId?>)">Enviar opinión</button>
</div>