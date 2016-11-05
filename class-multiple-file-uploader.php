<?php

class Multiple_File_Uploader extends File_Uploader {

    public function upload() {

        $total = count( $this->files['tmp_name'] );

        for ( $i = 0; $i < $total; $i++ ) {

            $file_size = $this->files['size'][ $i ];
            $file_name = $this->files['name'][ $i ];

            if ( 0 !== $this->files['error'][ $i ] ) {

                return $this->errors[ $this->files['error'][ $i ] - 1 ];

            }

            if ( false === $this->check_size( $file_size ) ) {

                return 'Tamanho inválido!';

            }

            if ( false === $this->check_extension( $file_name ) ) {

                return 'Extensão inválida!';

            }

            $path = $this->setup_directory();

            if ( false === move_uploaded_file( $this->files['tmp_name'][ $i ], $path . '/' . $file_name ) ) {

                return 'Não foi possível fazer o upload!';

            }

        }

        return 'Upload efetuado com sucesso!';

    }

}
