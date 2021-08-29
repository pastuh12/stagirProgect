<?php
//
//namespace App\Mail;
//
//use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Mail\Mailable;
//use Illuminate\Queue\SerializesModels;
//
//class Feedback extends Mailable
//{
//    use Queueable, SerializesModels;
//
//    private string $name;
//    private string $text;
//
//    /**
//     * Create a new message instance.
//     *
//     * @return void
//     */
//    public function __construct(string $name, string $text)
//    {
//        $this->name = $name;
//        $this->text = $text;
//    }
//
//    /**
//     * Build the message.
//     *
//     * @return $this
//     */
//    public function build()
//    {
//        return $this->view('view.name')
//            ->with([
//                'userName' => $this->name,
//                'text' => $this->text,
//            ]);
//    }
//}
