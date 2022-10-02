<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">

            <tbody>
            @for ($i = 1; $i <= $lastQuiz->numberOfQuestions; $i++)
                <tr>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="text" placeholder="head question number {{$i}}">
                        </div>
                    </td>

                </tr>

                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">

                            <input type="text" class="form-control" name="text" placeholder="first choice">
                            <input type="text" class="form-control" name="text" placeholder="second choice">
                            <input type="text" class="form-control" name="text" placeholder="third choice">
                            <input type="text" class="form-control" name="text" placeholder="fourth choice">
                        </div>
                    </td>

                </tr>
            @endfor
            </tbody>
        </table>
    </div>
</div>