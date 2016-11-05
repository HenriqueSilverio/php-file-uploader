<?php

class Single_File_Uploader extends File_Uploader {

    public function upload() {

        $file_size = $this->files['size'];
        $file_name = $this->files['name'];

        if ( 0 !== $this->files['error'] ) {

            return $this->errors[ $this->files['error'] - 1 ];

        }

        if ( false === $this->check_size( $file_size ) ) {

            return 'Tamanho inválido!';

        }

        if ( false === $this->check_extension( $file_name ) ) {

            return 'Extensão inválida!';

        }

        $path = $this->setup_directory();

        if ( false === move_uploaded_file( $this->files['tmp_name'], $path . '/' . $file_name ) ) {

            return 'Não foi possível fazer o upload!';

        }

        return 'Upload efetuado com sucesso!';

    }

}
