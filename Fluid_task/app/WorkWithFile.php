<?php


class WorkWithFile
{
    private mixed $handle;
    private string $path;

//    РЕАЛИЗАЦИЯ МЕТОДОВ КЛАССА
    private function isFileImplementation(string $path): bool
    {
        return file_exists($path);
    }

    private function encodeToUTF8Implementation(string $content): string|null|false
    {
        if ($content === '') {
            return $content;
        }

        $encoding = ["Windows-1251", "ISO-8859-15", "ISO-8859-1", "UTF-8"];
        if (!mb_check_encoding($content, 'UTF-8')) {
            $fromEncoding = mb_detect_encoding($content, $encoding, true);
            return mb_convert_encoding($content, 'UTF-8', $fromEncoding);
        }

        return $content;
    }

    private function openFileImplementation(string $path)
    {
        $isFile = $this->isFile($path);
        if (!$isFile) {
            return false;
        }

        $this->path = $path;
        $this->handle = fopen($path, 'r');

        return $this->handle;
    }

    private function closeFileImplementation(): bool
    {
        $isFile = $this->isFile($this->path);
        if (!$isFile) {
            return false;
        }

        return fclose($this->path);
    }

    private function readLineImplementation(): string|false
    {
        return fgets($this->handle);
    }

    private function openFileAsStringImplementation(string $path): string|false
    {
        $isFile = $this->isFile($path);
        if (!$isFile) {
            return false;
        }

        return file_get_contents($path);
    }

    private function setStringToEndFileImplementation(string $pathToFile, string $fileName, string|int $content): int|false
    {
        $result = is_dir($pathToFile);
        if (!$result) {
            mkdir($pathToFile, 0777, true);
        }

        $pathToFile = $pathToFile . $fileName;

        return file_put_contents($pathToFile, $content . PHP_EOL, FILE_APPEND);
    }

    private function rewriteFileImplementation(string $pathToFile, string $fileName, string|int $content): int|false
    {
        $result = is_dir($pathToFile);
        if (!$result) {
            mkdir($pathToFile, 0777, true);
        }

        $pathToFile = $pathToFile . $fileName;

        return file_put_contents($pathToFile, $content . PHP_EOL);
    }


//    ИНТЕРФЕЙСЫ ДЛЯ РАБОТЫ С КЛАССОМ
    public function readLine(): string|false
    {
        return $this->readLineImplementation();
    }
    public function closeFile(): bool
    {
        return $this->closeFileImplementation();
    }
    public function openFile(string $path)
    {
        return $this->openFileImplementation($path);
    }
    public function rewriteFile(string $pathToFile, string $fileName, string|int $content): int|false
    {
        return $this->rewriteFileImplementation($pathToFile, $fileName, $this->encodeToUTF8($content));
    }

    public function setStringToEndFile(string $pathToFile, string $fileName, string|int $content): int|false
    {
        return $this->setStringToEndFileImplementation($pathToFile, $fileName, $this->encodeToUTF8($content));
    }

    public function openFileAsString(string $path): string|false
    {
        return $this->openFileAsStringImplementation($path);
    }

    public function isFile(string $path): bool
    {
        return $this->isFileImplementation($path);
    }

    public function encodeToUTF8(string $content): string|null|false
    {
        return $this->encodeToUTF8Implementation($content);
    }

}