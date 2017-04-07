<div class="lmc-question-container" id="lmc-question-container-{{ $question->id }}">

    <div class="lmc-question" id="lmc-question-{{ $question->id }}">
        <span class="lmc-question-text" id="lmc-question-text-{{ $question->id }}">{{ $question->text }}</span>
    </div>

    <div class="lmc-question-choices" id="lmc-question-choices-{{ $question->id }}">

        @foreach($question->choices as $choice)
            <div class="lmc-choice" id="lmc-choice-{{ $choice->id }}">
                <input type="radio" class="lmc-choice-input" id="lmc-choice-input-{{ $choice->id }}" name="lmc-question-input-{{ $question->id }}" value="{{ $choice->id }}"> 
                <label class="lmc-choice-label" id="lmc-choice-label-{{ $choice->id }}" for="lmc-choice-input-{{ $choice->id }}" {{ $choice->id == $selectedChoice->id ? 'checked' : '' }}>
                    <span class="lmc-choice-text" id="lmc-choice-text-{{ $choice->id }}">{{ $choice->text }}</span>
                    <span class="lmc-choice-description" id="lmc-choice-description-{{ $choice->id }}">{{ $choice->description }}</span>
                </label>
            </div>
        @endforeach

    </div>

</div>