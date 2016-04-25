{!! BootForm::text('seo[title]', 'Título', isset($model->seo) ? $model->seo->title : '', ['maxlength' => '80']) !!}

{!! BootForm::textarea('seo[description]', 'Descrição', isset($model->seo) ? $model->seo->description : '', ['maxlength' => '150']) !!}

{!! BootForm::text('seo[keywords]', 'Palavras chaves', isset($model->seo) ? $model->seo->keywords : '', ['maxlength' => '50']) !!}
