<?php
include 'class.smtp.php';
require("class.phpmailer.php"); //���ص��ļ�������ڸ��ļ�����Ŀ¼
$mail = new PHPMailer(); //�����ʼ�������
$address = "314003985@qq.com";
$mail->IsSMTP(); // ʹ��SMTP��ʽ����
$mail->CharSet='gb2312';// �����ʼ����ַ�����
$mail->Host = "shms3.wind.com.cn"; // ������ҵ�ʾ�����
$mail->SMTPAuth = true; // ����SMTP��֤����
$mail->Port = "25"; //SMTP�˿�
$mail->Username = "jshen.farrell@wind.com.cn"; // �ʾ��û���(����д������email��ַ)
$mail->Password = "csdnshi2B"; // �ʾ�����
$mail->From = "jshen.farrell@wind.com.cn"; //�ʼ�������email��ַ
$mail->FromName = "ľ�㶩Ʊ����";
$mail->AddAddress("$address", "");//�ռ��˵�ַ�������滻���κ���Ҫ�����ʼ���email����,��ʽ��AddAddress("�ռ���email","�ռ�������")
//$mail->AddReplyTo("", "");
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // ��Ӹ���
//$mail->IsHTML(true); // set email format to HTML //�Ƿ�ʹ��HTML��ʽ
$mail->Subject = "Wind��Ʊ������Ϊ������Ʊ"; //�ʼ�����
$mail->Body = "��Ʊ������Ϊ������Ʊ����Ͽ츶��"; //�ʼ�����
$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //������Ϣ������ʡ��
if(!$mail->Send())
{
echo "�ʼ�����ʧ��. <p>";
echo "����ԭ��: " . $mail->ErrorInfo;
exit;
}
echo "�ʼ����ͳɹ�";
?>