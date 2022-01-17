import React,{useState,useEffect} from 'react';
import {View,Text,Image,StyleSheet,TextInput,TouchableOpacity} from 'react-native';
import { auth } from "../firebase";
// import Home from './Home';
import Main from './Main';
import { useNavigation } from "@react-navigation/native";
const Login = () => {
    const navigation = useNavigation()

  const [email,setEmail] = useState('')
  const [password,setPassword] = useState('')  

  useEffect(() => {
    const unsubscribe = auth.onAuthStateChanged(user =>{
      if(user)
      {
        navigation.navigate(Main)
      }
    })
    return unsubscribe
  },[])

  const handleSignIn = () =>{
    auth.signInWithEmailAndPassword(email,password)
    .then(userCredentials => {
       const user = userCredentials.user;
       console.log(user.email);   
    })
    .catch(error => alert(error.message))
  }

        return(
            <View style={styles.container}>
                <Image source={require('../assets/Login.jpg')} style={styles.img}/>
                
             <View style={styles.input}>
                <TextInput 
                
                style = {styles.text}
                placeholder="Enter Email"
                placeholderTextColor='#ecf0f1' 
                onChangeText={text=>setEmail(text)}  
                />
                 <TextInput 
                
                style = {styles.text}
                placeholder="Enter Password"
                placeholderTextColor='#ecf0f1'
                onChangeText={text=>setPassword(text)}   
                />
            </View>
             <View> 
                 <TouchableOpacity style={styles.btn} onPress={handleSignIn}>
    
                        <Text style={{color:'white',fontWeight:'bold',fontSize:18}}>LOGIN</Text>
                </TouchableOpacity>
            </View> 
             <View style={styles.signup}>
                <TouchableOpacity onPress={() => this.props.navigation.navigate('Signup')}><Text style={{color:'#F58840', fontSize:18,fontWeight:'bold'}}>New User? SIGNUP</Text></TouchableOpacity>
            </View> 
        </View>
        );
    }



const styles = StyleSheet.create({
    container:{
        flex:1,
    },

    img:{
        width:400,
        height:400,
    },
    input:{
        height:'20%',
        marginTop:10
    },
    text:{
        backgroundColor:'#D06224',
        width:'80%',
        marginLeft:30,
        marginTop:25,
        borderWidth:1,
        borderColor:'#FF9B6A',
        borderRadius:20,
        padding:10,
        color:'white',
        textAlign:'center'
    },
    btn:{
        backgroundColor:'#105652',
        width:'50%',
        marginTop:30,
        marginLeft:80,
        padding:15,
        borderRadius:20,
        alignItems:'center',
       
    },
    signup:{
        marginTop:20,
        marginLeft:'25%',
    }
})

export default Login;