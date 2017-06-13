# aws-form
The program accepts specific information from the party sending it which are 
Sender mail = sender
Mail subject = subject
Mail body = body
Recepient mail = 'recipient' which is a csv file

it checks if the above are true if they aren't it bounces a 400 error
if its passed it checks the recepient mail csv file upload and opens and reads it 

if all is set very well 
it sends with the function 'send_email'
thats all i think
