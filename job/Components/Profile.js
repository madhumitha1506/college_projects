import React,{ useState, useEffect } from 'react';
import {Image,View,Text,TouchableOpacity,StyleSheet} from 'react-native';
import { Ionicons,AntDesign } from '@expo/vector-icons';
import { auth } from '../firebase';
import { database } from "../firebase";
import * as ImagePicker from 'expo-image-picker';
import EditProfile from './EditProfile';
import Login from './Login';
// onPress={()=>navigation.navigate(EditProfile)}
// import {getuser} from './EditProfile';
export default function Profile({navigation}) {
        const [image, setImage] = useState(null);
        
        const [name,setName] = useState('')
        const [primaryskill,setPrimaryskill] = useState('')
        const [secondaryskill,setSecondaryskill] = useState('')
        const [skill,setSkill] = useState('')
        // const users = user();
        const user = () =>{
            database.ref('users/').on('value',snapshot =>{
              const post = snapshot.val();
                setName(post.Name);
                setPrimaryskill(post.primaryskill);
                setSecondaryskill(post.secondaryskill);
                setSkill(post.skill);
            })
          }
        //   console.log(users);
          
        const pickImage = async () => {
            // No permissions request is necessary for launching the image library
            let result = await ImagePicker.launchImageLibraryAsync({
              mediaTypes: ImagePicker.MediaTypeOptions.All,
              allowsEditing: true,
              aspect: [4, 3],
              quality: 1,
            });
            // console.log(result);

            if (!result.cancelled) {
              setImage(result.uri);
            }
          };

          const handleSignOut = () =>{
                auth.signOut()
                .then(()=>{
                  navigation.navigate(Login)
                })
                .catch(error =>alert(error.message))
              }
            
          
        return(
            <View>
                <Image source = {{uri:image}} style={styles.userimg}  />
                <AntDesign name="plus" size={50} color="green" onPress={pickImage} style={styles.plus}  />
                <Text style={styles.username}>{name}</Text>
                <Text style={styles.username}>{auth.currentUser.email}</Text>
                <Text style={styles.username}>Skills:
                    {'\n\n'}
                    <AntDesign name="checkcircle" size={20} color="green"/>{primaryskill}
                    {'\n\n'}
                   <AntDesign name="checkcircle" size={20} color="green"/> {secondaryskill}
                    {'\n\n'}
                    <AntDesign name="checkcircle" size={20} color="green"/> {skill}
                </Text>
                <View>
                    <TouchableOpacity style={{marginLeft:70,marginRight:70}} onPress={user}  >
                        <Text style={{textAlign:'center',marginTop:50,borderStyle:'solid',borderWidth:2,padding:18,fontSize:20,borderRadius:20,fontWeight:'bold'}} 
                            >View Data <AntDesign name="edit" size={24} color="red"/></Text>
                    </TouchableOpacity>
                  <TouchableOpacity style={{marginLeft:70,marginRight:70}}  onPress={handleSignOut} >
                        <Text style={{textAlign:'center',marginTop:50,borderStyle:'solid',borderWidth:2,padding:18,fontSize:20,borderRadius:20,fontWeight:'bold'}}>Signout</Text>
                    </TouchableOpacity> 
                </View>
                
            </View>
        );
    }

const styles = StyleSheet.create({
    userimg:{
        width:150,
        height:150,
        marginLeft:110,
        borderRadius:75,
        marginTop:30,
        borderWidth:2,
        borderColor:'black',
        position:'relative'
    },
    username:{
        textAlign:'center',
        marginTop:15,
        marginLeft:10,
        fontSize:20,
        
    },
    plus:{
        position:'absolute',
        top:135,
        left:210,

    }
})

