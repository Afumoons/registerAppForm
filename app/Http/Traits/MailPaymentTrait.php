<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Mail;

use App\Models\MailPayment;
use App\Models\Email;

use App\Mail\ConfirmPay;
use App\Mail\RejectedPay;

trait MailPaymentTrait {

    public function saveEmailTemplate($link, $email, $type)
    {
        $mail_tmp = new MailPayment;
        $mail_tmp->link_id = $link->id;
        $mail_tmp->information = $email;
        $mail_tmp->type = $type;
        $mail_tmp->save();
    }

    public function updateEmailTemplate($link, $email, $type)
    {
        $mail_tmp = MailPayment::where('link_id', $link->id)->where('type', $type)->first();
        $mail_tmp->information = $email;
        $mail_tmp->save();
    }

    public function sendMailPayment($link, $member, $invoice, $reject = false, $message = null){
        if($reject)
        {
            $information = $message;
        } else {
            foreach($link->mails as $item){
                if($item->type == 'confirmation'){
                    $information = $item->information;
                }
            }
        }
        $data = array(
            'name'      =>  $member->full_name,
            'acara'     => $link->title,
            'message'   =>   $information,
            'valid_until' => $invoice->valid_until,
            'link_pay'  => route('form.link.pay', ['link' => $link->link_path, 'payment' => $invoice->token])
        );
        $from_mail = Email::EMAIL_FROM;

        try {
            if ($reject) {
                Mail::to($member->email)->send(new RejectedPay($data, $from_mail));
            } else {
                Mail::to($member->email)->send(new ConfirmPay($data, $from_mail));
            }
            $mail_db = new Email;
            $mail_db->send_from = $from_mail;
            $mail_db->send_to = $member->email;
            $mail_db->message = $information;
            $mail_db->user_id = $member->id;
            $mail_db->type_email = Email::TYPE_EMAIL[0];
            $mail_db->sent_count = 1;
            $mail_db->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}